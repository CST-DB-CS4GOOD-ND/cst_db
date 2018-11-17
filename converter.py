"""A script for processing the quotes/experiences stored in the Word documents
given to use by CST, assuming they're formatted like the "samples SSL 2017.docx"
file.

Converts the .docx file to a tab and newline-delimited plaintext file.
"""


import docx
fname = "samples SSL 2017"


def parse_doc(filename):
    alternate = False
    doc = docx.Document(filename + ".docx")
    data = []
    for p in doc.paragraphs:
        if p.text != "**" and p.text != "":
            # alternates between delimitng by newlines and tabs
            if alternate:
                data.append(p.text + "\n \n")
                alternate = False
            else:
                data.append(p.text + "\t \t")
                alternate = True
            print(alternate)
    return data


def main():
    print("Converting {} to plaintext...".format(fname))
    text = parse_doc(fname)
    with open(fname + ".txt", "w") as f:
        print("Writing to {}.txt...".format(fname))
        for l in text:
            f.write(l)
    print("Done.")
    input()


main()
