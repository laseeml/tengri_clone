import requests
from bs4 import BeautifulSoup
from mysql.connector import IntegrityError
import mysql.connector

def get_description(link):
    response = requests.get(link)
    soup = BeautifulSoup(response.text, 'html.parser')
    description_title = soup.find('h2', class_='content_main_desc')
    if description_title:
        description_title = description_title.text.strip()
    else:
        description_title = 'Description Title Not Found'

    description_text = ''
    content_main_text = soup.find('div', class_='content_main_text')
    if content_main_text:
        p_tags = content_main_text.find_all('p')
        for p in p_tags[1:-1]:  # Exclude the last <p> tag
            description_text += p.text.strip() + '\n'

        # blockquote = content_main_text.find('blockquote')
        # if blockquote:
        #     description_text += blockquote.text.strip()
    else:
        description_text = "Description Text Not Found"

    return description_title, description_text

def scrap_data():
    url = 'https://tengrinews.kz/news/'

    response = requests.get(url)
    soup = BeautifulSoup(response.text, 'html.parser')
    news_items = soup.find_all(class_='content_main_item')
    return_data = []

    for item in news_items:
        title_element = item.find(class_='content_main_item_title')
        title = title_element.text.strip()
        link = title_element.find('a')['href']
        image_path = item.find('img', class_='content_main_item_img')['src']

        # print("Title:", title)
        # print("Image Path:", 'tengrinews.kz' + image_path)
        # print("Link:", link)

        link = 'https://tengrinews.kz' + link

        description_title, description_text = get_description(link)

        # print("Description Title:", description_title)
        # print("Description Text:", description_text)

        news = (
            title,
            description_title,
            description_text,
            'https://tengrinews.kz' + image_path,
        )

        return_data.append(news)

        # print()

    # laravel_url = 'http://localhost:8000/api/news/import'
    # response = requests.post(laravel_url, json=return_data)
    return return_data

def insert_data_into_database(data):
    try:
        # Establish connection to MySQL database
        cnx = mysql.connector.connect(
            host='127.0.0.1',
            port='8889',
            user='admin',
            password='',
            database='tengriNews'
        )

        # Create a cursor object
        cursor = cnx.cursor()

        # Define the SQL query to check if title exists
        check_query = "SELECT title FROM news WHERE title = %s"

        # Define the SQL query to insert data into the database
        query = "INSERT INTO news (title, description_title, description, image, category_id) VALUES (%s, %s, %s, %s, 1)"

        # Execute the SQL query with the data
        for row in data:
            title = row[0]

            # Execute the query to check if title exists
            cursor.execute(check_query, (title,))

            # Fetch the result
            result = cursor.fetchone()

            # If title does not exist, insert the record
            if not result:
                cursor.execute(query, row)

        # Commit the transaction
        cnx.commit()

        # Close the cursor and connection
        cursor.close()
        cnx.close()

        print("Data inserted successfully.")

    except IntegrityError as e:
        print("Error:", e)
        print("Skipping duplicate entry.")

scraped_data = scrap_data()

insert_data_into_database(scraped_data)
