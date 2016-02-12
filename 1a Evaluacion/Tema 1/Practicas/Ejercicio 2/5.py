# -*-coding: UTF-8 -*-
#!/usr/bin/python

print("Cálculo de términos de la sucesión U(n+1)=3.U(n)+1 si n es impar y U(n)=U(n)/2 si n es par.")
u=int(input("Digame el valor de U(0): "))
n=int(input("Digame cuantos terminos quiere: "))

lista = []
lista.append(u)
for i in range(1,n):
    if lista[(i-1)]%2==0:
        lista.append(((int(lista[(i-1)]))/2))
    else:
        lista.append(((int(lista[(i-1)]))*3)+1)
    #if i%2==0:
#        lista.append(((int(lista[(i-1)]))/2))
#    else:
#        lista.append(((int(lista[(i-1)]))*3)+1)

listaString=""
for x in lista:
    listaString+= ''.join(str(int(x)))
    listaString+= " "
print("Los terminos de la sucesion son: ", listaString)
