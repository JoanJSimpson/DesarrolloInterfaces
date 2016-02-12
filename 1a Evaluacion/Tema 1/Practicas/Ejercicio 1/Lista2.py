# -*-coding: UTF-8 -*-
#!/usr/bin/python
numero=int(input( "Digame cuantas palabras tiene la lista: "))
cont = 0
lista = []
while cont < numero:
    print("Digame la palabra", str(cont + 1) + ": ")
    nombre=input()
    lista+=[nombre]
    cont=cont+1
print("La lista creada es: ",lista)
buscar=str(input("Digame la palabra a buscar: "))
cont=0
for i in lista:
    if i == buscar:
        cont=cont+1
if cont == 0 :
    print ("La palabra '" + buscar + "' no aparece en la lista")
elif cont == 1 :
    print ("La palabra '" + buscar + "' aparece una vez en la lista")
else :
    print ("La palabra '" + buscar + "' aparece ",cont," veces en la lista")
    
