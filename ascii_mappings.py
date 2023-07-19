import os

mappings = {
    'í': 'i',
    'á': 'a',
    'é': 'e',
    'ó': 'o',
    'ú': 'u',
    'ñ': 'n',
    'Á': 'A',
    'Ó': 'O'
}

os.chdir('stats_mlb/batting')
file_names = os.listdir()

for file in file_names:
    new = file
    for i in mappings.keys():
        new = new.replace(i,mappings[i])
    if new != file:
        print('rename')
        os.rename(file,new)



    