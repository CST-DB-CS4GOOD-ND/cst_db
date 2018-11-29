"""A script for processing the quotes/experiences stored in the Word documents
given to use by CST, assuming they're formatted like the "samples SSL 2017.docx"
file.

Takes the "experience" data stored in a .docx file and inserts it into the
target database.
"""


import docx
import mysql.connector
fname = "samples SSL 2017"

db_name = ""
db_user = ""
db_password = ""

cnx = mysql.connector.connect(user=db_user, database=db_name, password=db_password)
cursor = cnx.cursor(buffered=True)


def parse_doc(filename):
    alternate = False
    doc = docx.Document(filename + ".docx")
    data = []
    old = ""
    for p in doc.paragraphs:
        if p.text != "**" and p.text != "":
            # inserts experience and quote into list as tuple
            # thing[0] is quote, thing[1] is experience
            if alternate:
                data.append((old.text, p.text))
                alternate = False
            else:
                alternate = True
        old = p
    return data


def get_quote_id(text):
    cursor.execute("INSERT IGNORE INTO quotes (quote, theme_id) VALUES (%s, 3)", (text,))
    cursor.execute("SELECT quote_id FROM quotes WHERE quote = %s", (text,))
    for c in cursor:
        print(c)
        return c


def insert_new(data):
    for datum in data:
        s = "INSERT INTO experiences (experience, quote_id) VALUES (%s, %s)"
        cursor.execute(s, (datum[1], datum[0]))


def main():
    print("Make sure db_name, db_user, and db_password are set in the script file. Press enter to continue.")
    input()
    print("Retrieving experiences...".format(fname))
    experiences = parse_doc(fname)
    toInsert = []
    for experience in experiences:
        quoteid = get_quote_id(experience[0])
        toInsert.append((quoteid[0], experience[1]))
        print((quoteid[0], experience[1]))
        insert_new(toInsert)
    print("Done.")
    cursor.close()
    cnx.close()
    input()


main()
