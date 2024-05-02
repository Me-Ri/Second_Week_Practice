from docxtpl import DocxTemplate, R
from docx import Document
import pymorphy2
import os
import csv

#############################################################################

def delete_file(name_file):
    if(os.path.exists(name_file)):
	    os.remove(name_file)

#############################################################################

delete_file("doc-final.docx")

php_mas =   [
	        "Иванов Иван Иванович",
            "Иванова Иван Ивановна",
            "Петров Петр Петрович",
            "Евдакимов Егор Александрович",
            "Югорский государственный университет",
            "2",
            "1521б",
            [],
            "Югорский государственный университет",
            "доцент",
            "учебная",
            "22.04.2024-04.05.2024",
            "доцент",
            "программная инженерия",
            "доцент",
            "доцент",
            "ознакомительная",
            "ул.Чехова, 16",
            "ахуенный, невьебенный, современный",
            "отлично",
            "в полном объеме",
            "нет замечаний",
            "5",
            "доцент"
		    ]

veriables = [   
	        "initials_manager_enterprise",
            "initials_manager_organization",
            "initials_manager_ugu",
            "initials_student",
            "FNP_student",
            "university",
            "course",
            "group",
            "task",
            "place_practice",
            "post_manager_enterprise",
            "type_practice",
            "dates_practice",
            "post_manager_organization",
            "direction_training",
            "start_dates",
            "start_month",
            "finish_dates",
            "finish_month",
            "post_manager_ugu",
            "post_manager_organization",
            "name_practice",
            "address_orginization",
            "quality",
            "problems",
            "completing_task",
            "comments",
            "grade",
            "post_manager_enterprise"
		    ]

#############################################################################


def fill_table():
    mas_issues = []

    with open('issues.csv', 'r',  encoding='utf-8-sig', newline='') as csvfile:
        spamreader = csv.reader(csvfile, delimiter=',', quotechar='|')
        for row in spamreader:
            mas_issues.append([row[9], row[13], row[7]])

    doc_table = Document("образец документа.docx")

    doc_table.tables[4]

    name_sername_mas = php_mas[3].split()
    name_sername = name_sername_mas[1] + " " + name_sername_mas[0]

    count_row = 3
    for i in range(3, len(mas_issues) + 2):
        if(mas_issues[i - 2][0] == name_sername):
            for j in range(0, 2):
                if (j == 0):
                    doc_table.tables[4].cell(count_row, j).text = mas_issues[i - 2][1]
                if (j == 1):
                    doc_table.tables[4].cell(count_row, j).text = mas_issues[i - 2][2]
                    php_mas[7].append(mas_issues[i - 2][2])
            count_row += 1

    doc_table.save("table.docx")

#############################################################################

fill_table()
doc = DocxTemplate("table.docx")

def generate_tasks():
    for i in range (0, len(php_mas[8])):
        ok = str(i + 1) + ') ' + php_mas[8][i]
        yield ok
		
def initials():
	php_mas.insert(4, php_mas[3])
	for i in range(0, 4):
		mas = php_mas[i].split()
		init = mas[0] + " " + mas[1][0] + "." + mas[2][0] + "."
		php_mas[i] = init

def dates():
      mas_month = ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"]
      php_mas.insert(15, php_mas[12][0:2]) 
      php_mas.insert(16, mas_month[int(php_mas[12][3:5]) - 1])
      php_mas.insert(17, php_mas[12][11:13])
      php_mas.insert(18, mas_month[int(php_mas[12][14:16]) - 1])

initials()
dates()

contex = {veriables[i]:php_mas[i] for i in range(len(veriables))}
contex['task'] = R("\n\t".join(generate_tasks()))

doc.render(contex)

doc.save("doc-final.docx")

delete_file("table.docx")


























# morph = pymorphy2.MorphAnalyzer()

# vid = morph.parse("учебная")[0]
# mas = [vid.inflect({"nomn"}).word,vid.inflect({"gent"}).word,vid.inflect({"datv"}).word,vid.inflect({"accs"}).word,vid.inflect({"ablt"}).word,vid.inflect({"loct"}).word]

# print(mas)