# -*-coding: UTF-8 -*-
#!/usr/bin/python
numero=int(input( "Digame cuantas palabras tiene la lista: "))
print("La lista tiene: ",numero," palabras.")
if numero==0 :
    print("¡Imposible!")
else :
    cont = 0
    lista = []
    while cont < numero:
        print("Digame la palabra", str(cont + 1) + ": ")
        nombre=input()
        lista+=[nombre]
        cont=cont+1
    print(lista)

    
