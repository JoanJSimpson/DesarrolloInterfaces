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
cont = 0
for i in range(len(lista)-1, -1, -1):
    if lista[i] in lista[:i]:
            del(lista[i])
print("La lista sin repeticiones es: ",lista)
