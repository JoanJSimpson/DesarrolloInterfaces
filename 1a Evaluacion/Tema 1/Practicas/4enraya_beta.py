#! /usr/bin/env python
# -*- coding: utf-8 -*-

import random
import os
#listaH = "|_|_|_|_|_|_|_|_|"
listaNum= " 0 1 2 3 4 5 6 7"
listaH = ["|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|"]
#listaH3 = [|,_,|,_,|,_,|,_,|,_,|,_,|,_,|,_,|]
listaJugador1 = [[0,0,0,0,0,0,0,0]for x in range(8)]
listaJugador2 = [[0,0,0,0,0,0,0,0]for x in range(8)]
listaV = [listaH, listaH, listaH, listaH, listaH, listaH, listaH, listaH]
matriz = [["|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|"]for x in range(8)]
#for i in range(1, 9):
#    print(listaH, i)
#print (listaNum)


#matriz[0][3] = "X"
def dibujar():
    os.system('clear')
    string= ""
    for i in range(len(listaV)):
        for j in range(len(listaH)):
            string = string+matriz[i][j]
        string=string+str(i)
        if i<7:
            string=string+"\n"
            
    print (string)
    print (listaNum)



jugador = ""
turno = ""
maquina = ""

def jugarJugador(columna, fila):
    if jugador=="1":
        matriz[fila][columna]="#"
    else:
        matriz[fila][columna]="@"

def jugarJugador2(columna, fila):
    if jugador=="1":
        matriz[fila][columna]="@"
    else:
        matriz[fila][columna]="#"
        

dibujar()
salir= "no"
##while salir == "no":
##    jugador = (input( "Elije jugador --->  1: #  2: @ ------->    "))
##    if jugador == "1" or jugador == "2":
##        salir = "si"
jugador = (input( "Elije jugador --->  1: #  2: @ ------->    "))

if jugador == "1":
    maquina = "2"
else:
    maquina ="1"
    
        
    

##listaV[0][15]="x"
##string2= ""
##for i in range(len(listaV)):
##    for j in range(len(listaV[i])):
##        string2 = string2+listaV[i][j]
##    string2=string2+"\n"
##print (string2)

##salir = 1
##while salir > 0:
##    columna = int (input( "Introduce la columna donde quieres poner la ficha: "))
##    if columna==0:
##        columna=1
##    elif columna==1:
##        columna=3
##    elif columna==2:
##        columna=5
##    elif columna==3:
##        columna=7
##    elif columna==4:
##        columna=9
##    elif columna==5:
##        columna=11
##    elif columna==6:
##        columna=13
##    elif columna==7:
##        columna=15
##    fila = int (input( "Introduce la fila donde quieres poner la ficha: "))
##    jugarJugador(columna, fila)
##    dibujar()
##    salir = int (input("Quiere salir del programa? 0-Si 1-No: "))


def esGanador ():
    ganador =0
    for i in range (len(listaJugador1)):
        for j in range(len(listaJugador1[i])):
            ##comprobar la vertical
            if i<5:
                if listaJugador1[i][j]==1 and listaJugador1[i+1][j]==1 and listaJugador1[i+2][j]==1 and listaJugador1[i+3][j]==1:
                    ganador = 1
                if listaJugador2[i][j]==1 and listaJugador2[i+1][j]==1 and listaJugador2[i+2][j]==1 and listaJugador2[i+3][j]==1:
                    ganador = 2
            ##comprobar horizontal
            if j<5:
                if listaJugador1[i][j]==1 and listaJugador1[i][j+1]==1 and listaJugador1[i][j+2]==1 and listaJugador1[i][j+3]==1:
                    ganador = 1
                if listaJugador2[i][j]==1 and listaJugador2[i][j+1]==1 and listaJugador2[i][j+2]==1 and listaJugador2[i][j+3]==1:
                    ganador = 2
                
            ##comprobar resto
            if j<5 and i>2:
                if listaJugador1[i][j]==1 and listaJugador1[i-1][j+1]==1 and listaJugador1[i-2][j+2]==1 and listaJugador1[i-3][j+3]==1:
                        ganador = 1
                if listaJugador2[i][j]==1 and listaJugador2[i-1][j+1]==1 and listaJugador2[i-2][j+2]==1 and listaJugador2[i-3][j+3]==1:
                        ganador = 2
            if j<5 and i<5:
                if listaJugador1[i][j]==1 and listaJugador1[i+1][j+1]==1 and listaJugador1[i+2][j+2]==1 and listaJugador1[i+3][j+3]==1:
                    ganador = 1
                if listaJugador2[i][j]==1 and listaJugador2[i+1][j+1]==1 and listaJugador2[i+2][j+2]==1 and listaJugador2[i+3][j+3]==1:
                    ganador = 2
    if ganador == 1:
        print("Enhorabuena!!! Has ganado!!")
        return "1"
    elif ganador == 2:
        print ("Lo siento, has perdido :( ")
        return "2"
    else:
        return "0"
salir = "n"
##poner un metodo esGanador (true o false)
while esGanador() == "0":
    columna = int (input( "Introduce la columna donde quieres poner la ficha: "))
    if columna==0:
        columna=1
    elif columna==1:
        columna=3
    elif columna==2:
        columna=5
    elif columna==3:
        columna=7
    elif columna==4:
        columna=9
    elif columna==5:
        columna=11
    elif columna==6:
        columna=13
    elif columna==7:
        columna=15
    ##modificamos las columnas para que cuadren con las casillas
    if matriz[7][columna] == "_":
        jugarJugador(columna,7)
        listaJugador1[7][int(columna/2)]=1;
    elif matriz[6][columna] == "_":
        jugarJugador(columna,6)
        listaJugador1[6][int(columna/2)]=1;
    elif matriz[5][columna] == "_":
        jugarJugador(columna,5)
        listaJugador1[5][int(columna/2)]=1;
    elif matriz[4][columna] == "_":
        jugarJugador(columna,4)
        listaJugador1[4][int(columna/2)]=1;
    elif matriz[3][columna] == "_":
        jugarJugador(columna,3)
        listaJugador1[3][int(columna/2)]=1;
    elif matriz[2][columna] == "_":
        jugarJugador(columna,2)
        listaJugador1[2][int(columna/2)]=1;
    elif matriz[1][columna] == "_":
        jugarJugador(columna,1)
        listaJugador1[1][int(columna/2)]=1;
    elif matriz[0][columna] == "_":
        jugarJugador(columna,0)
        listaJugador1[0][int(columna/2)]=1;
    dibujar()
    ##turno segundo jugador
    columna2=random.randint(0,7)
    if columna2==0:
        columna2=1
    elif columna2==1:
        columna2=3
    elif columna2==2:
        columna2=5
    elif columna2==3:
        columna2=7
    elif columna2==4:
        columna2=9
    elif columna2==5:
        columna2=11
    elif columna2==6:
        columna2=13
    elif columna2==7:
        columna2=15

    if matriz[7][columna2] == "_":
        jugarJugador2(columna2,7)
        listaJugador2[7][int(columna2/2)]=1;
    elif matriz[6][columna2] == "_":
        jugarJugador2(columna2,6)
        listaJugador2[6][int(columna2/2)]=1;
    elif matriz[5][columna2] == "_":
        jugarJugador2(columna2,5)
        listaJugador2[5][int(columna2/2)]=1;
    elif matriz[4][columna2] == "_":
        jugarJugador2(columna2,4)
        listaJugador2[4][int(columna2/2)]=1;
    elif matriz[3][columna2] == "_":
        jugarJugador2(columna2,3)
        listaJugador2[3][int(columna2/2)]=1;
    elif matriz[2][columna2] == "_":
        jugarJugador2(columna2,2)
        listaJugador2[2][int(columna2/2)]=1;
    elif matriz[1][columna2] == "_":
        jugarJugador2(columna2,1)
        listaJugador2[1][int(columna2/2)]=1;
    elif matriz[0][columna2] == "_":
        jugarJugador2(columna2,0)
        listaJugador2[0][int(columna2/2)]=1;
    
    dibujar()
