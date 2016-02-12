# -*-coding: UTF-8 -*-
#!/usr/bin/python

print("Calculo de terminos de una sucesion U(n+1)=a.U(n)+b")

a=int(input("Digame el valor de a: "))
b=int(input("Digame el valor de b: "))
u=int(input("Digame el valor de U(0): "))
n=int(input("Digame cuantos terminos quiere: "))

lista = []
lista.append(u)
for i in range(1,n):
    lista.append(((int(lista[(i-1)]))*a)+b)
listaString=""
for x in lista:
    listaString+= ''.join(str(x))
    listaString+= " "
print("Los terminos de la sucesion son: ", listaString)

 
