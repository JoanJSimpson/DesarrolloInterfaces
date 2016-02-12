# -*-coding: UTF-8 -*-
#!/usr/bin/python
numero=int(input( "Digame cuantas palabras tiene la lista: "))
cont = 0
lista = []
listaInv = []
while cont < numero:
    print("Digame la palabra", str(cont + 1) + ": ")
    nombre=input()
    lista+=[nombre]
    cont=cont+1
print("La lista creada es: ",lista)

for i in lista:
    listaInv = [i] + listaInv
            
print("La lista invertida es: ",listaInv)
