# -*-coding: UTF-8 -*-
#!/usr/bin/python

numero = int(input("Dime un numero: "))
i=1
lista = []
while i<=numero:
    if numero%i==0:
        lista.append(i)
    i+=1
print("El numero ",numero," tiene ",len(lista)," divisores : ",lista)
