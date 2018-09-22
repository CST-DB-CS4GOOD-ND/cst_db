"""A script for processing the quotes/experiences stored in the Word documents
given to use by CST, assuming they're formatted like "samples SSL 2017.docx"
file.

First extracts the plaintext with docx, then inserts it into the MySQL database,
eventually. Right now it turns it into plaintext."""

import docx
fname = "samples SSL 2017"


def parse_doc(filename):
    doc = docx.Document(filename + ".docx")
    data = []
    for p in doc.paragraphs:
        if p.text != "**" and p.text != "":
            data.append(p.text + "\n")
    return data


def insert_into_database():
    pass


def main():
    print("CST Quote Inserter")
    text = parse_doc(fname)
    with open(fname + ".txt", "w") as f:
        print("Writing to {}.txt...".format(fname))
        f.writelines(text)
    print("Done.")
    # insert_into_database(txt)


main()
