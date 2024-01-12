from bs4 import BeautifulSoup
import requests
import re
import mysql.connector

db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="simsaifah"
)
mydb = db.cursor()
sql = "insert into stock(phonenumber,network,price,sum,status,owner) value(%s,%s,%s,%s,%s,%s)"
myphone = db.cursor()


session = requests.session()

url = r"https://www.berlnw.com/%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%9A%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%87%E0%B8%84%E0%B8%A5/filter?page=1&sort_limit=1000&v=U2FsdGVkX1/Hd6psfk9p8BVEc7Aw%2BX9uoetBRpVk0iUP8fBrb2d93cn2jvYHJeOHduxccn6W4OhpoOEZyovmsf0Uh9dgKInZVwImVspBN9aFqrnZz3ibGL079k%2BnMXAdv6xe6j13wSkr718gRxyXXQ62ibIaczl4mkLFKLn0ooPFyq%2B7GTjnlQrFVZYrz70RRFhsKMtDGsFNIFG6KLCgs6f/9U8gJeCprvA8LSpvQr4="
# url = r"https://www.berlnw.com/%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B9%80%E0%B8%9A%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%A1%E0%B8%87%E0%B8%84%E0%B8%A5/filter?page=4&sort_limit=1000&v=U2FsdGVkX1%2BUzp4JkkNHzpGL6TBIvCJbAz4NoB7k7KvyXiPE3PweoAoThim8Svcm47jNEPv11D4c38C2X0w8nWyejR7MYsZSPKykVJRoTBotphRVJmztcjHxlAK9mHwMspVoqk7Naa1D2Ka9ihMdvlPqiXJrN5VF1urfl04mpXYNaRW%2B%2BA%2B93qcsLJ7ytiWoM3q4Q2m0DeHW%2BSbthSvd9mt35x0/hp6XrJHL7LOkHeGzOmTbylILYzkpq137wUA1/U/CvVJJp4A1eh7TX/ICVqVdeqb8APR3HW2OFpnOFLkO8G5OrtgKxWOWr3oIZoIYY6eng4WtVcIm7ypZRAW/5A=="
page = session.get(url)

soup = BeautifulSoup(page.content, "html.parser")
items = soup.select("div.no-padding.margin-10px-bottom")
print(len(items))
for item in items:
    # เบอร์
    phone = item.select_one("h6 > span").text
    # เครือข่าย
    network = item.select_one("img")['src'].split("/")[-1]
    # ราคา
    price = item.select_one("h8.price").text.split(
        ".")[0].strip() if item.select_one("h8.price") else "0"

    sum = 0
    for x in phone:
        if x.isdigit() == True:
            z = int(x)
            sum = sum + z

    if int(price) > 0:
        status = ("avialable")
    else:
        status = ("booked")

    owner = 1

    print([phone, network, price, sum, status, owner])
    val = [phone, network, price, sum, status, owner]
    mydb.execute(sql, val)
    db.commit()
