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
numero=int(input( "Digame cuantas palabras tiene la lista a eliminar: "))
if numero < 1 :
    print("¡Imposible!")
else :
    cont = 0
    lista2 = []
    while cont < numero:
        print("Digame la palabra", str(cont + 1) + ": ")
        nombre=input()
        lista2+=[nombre]
        cont=cont+1
    print("La lista de palabras a eliminar es: ",lista2)

    for i in lista2:
        for j in range(len(lista)-1, -1, -1):
            if lista[j] == i:
                del(lista[j])
            
    print("La lista es ahora: ",lista)
