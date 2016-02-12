# -*-coding: UTF-8 -*-
#!/usr/bin/python

numero = int(input("Dime un numero: "))
lista = []
for i in range(1,numero):
    contador=0
    #print ("Numero: ",i)
    for j in range(1,i+1):
        #print (j)
        if (i%j==0):
            contador+=1
    if contador == 2 and i>2:
            lista.append(i)
listaString = ""
for x in lista:
    listaString+= ''.join(str(x))
    listaString+= " "
print("Primos hasta ",numero," : ",listaString)
