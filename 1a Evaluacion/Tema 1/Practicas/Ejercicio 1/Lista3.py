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
buscar=str(input("Palabra a sustituir: "))
sust=str(input("por la palabra: "))
pos=0
for i in lista:
    if i == buscar:
        lista[pos]=sust
    pos=pos+1
print("La lista es ahora: ",lista)
