# -*-coding: UTF-8 -*-
#!/usr/bin/python

numero = int(input("Dime cuantas palabras tiene la lista: "))
if numero==0 :
    print("No pueden haber 0 palabras")
else :
    cont = 0
    lista = []
    while cont < numero:
        print("Digame la palabra", str(cont + 1) + ": ")
        nombre=input()
        lista+=[nombre]
        cont+=1
    print("La lista creada es: ",lista)
    lista.sort()
    print("La lista ordenada es: ", lista)
    
