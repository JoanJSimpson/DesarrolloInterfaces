# -*-coding: UTF-8 -*-
#!/usr/bin/python
numero=int(input( "Digame cuantas palabras tiene la primera lista: "))
cont = 0
lista = []
while cont < numero:
    print("Digame la palabra", str(cont + 1) + ": ")
    nombre=input()
    lista+=[nombre]
    cont=cont+1
for i in range(len(lista)-1, -1, -1):
    if lista[i] in lista[:i]:
            del(lista[i])
print("La lista sin repeticiones es: ",lista)

numero=int(input( "Digame cuantas palabras tiene la segunda lista: "))
cont = 0
lista2 = []
while cont < numero:
    print("Digame la palabra", str(cont + 1) + ": ")
    nombre=input()
    lista2+=[nombre]
    cont=cont+1
for i in range(len(lista2)-1, -1, -1):
    if lista2[i] in lista2[:i]:
            del(lista2[i])
print("La segunda lista sin repeticiones es: ",lista2)

palabrasComunes = []
for i in lista:
    if i in lista2:
        palabrasComunes += [i]
print("Palabras comunes a las dos listas: ",palabrasComunes)

soloPrimera = []
for i in lista:
    if i not in lista2:
        soloPrimera += [i]
print("Palabras que solo aparecen en la primera lista: ",soloPrimera)

soloSegunda = []
for i in lista2:
    if i not in lista:
        soloSegunda += [i]
print("Palabras que solo aparecen en la segunda lista: ",soloSegunda)
        
