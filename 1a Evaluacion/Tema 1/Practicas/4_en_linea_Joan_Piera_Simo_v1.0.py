#! /usr/bin/env python
# -*- coding: utf-8 -*-

import random
import os

listaNum= " 0 1 2 3 4 5 6 7"
listaJugador1 = [[0,0,0,0,0,0,0,0]for x in range(8)]
listaJugador2 = [[0,0,0,0,0,0,0,0]for x in range(8)]
matriz = [["|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|", "_", "|"]for x in range(8)]


def dibujar():
    os.system('clear')
    string= ""
    for i in range(len(matriz)):
        for j in range(len(matriz[i])):
            string = string+matriz[i][j]
        string=string+str(i)
        if i<7:
            string=string+"\n"
            
    print (string)
    print (listaNum)



jugador = -1
turno = ""
maquina = ""

def jugarJugador(columna, fila, turno):
    if turno=="1" and jugador== 1:
        matriz[fila][columna]="#"
    elif turno =="1" and jugador ==2:
        matriz[fila][columna]="@"
    elif turno =="2" and jugador ==1:
        matriz[fila][columna]="@"
    elif turno =="2" and jugador ==2:
        matriz[fila][columna]="#"
    else:
        print("Error")
        

##dibujamos la matriz cuando arranca el juego
dibujar()

##Comprobamos que los valores introducidos al elejir jugador sean validos
while int(jugador)<1 or int(jugador)>2: 
    jugador = int(input( "Elije jugador --->  1: #  2: @ ------->    "))
    if int(jugador)<1 or int(jugador)>2:
        print("¡¡¡Error al elejir usuario!!! Pulsa 1 o 2")
    
        
##comprobamos si algun jugador ha ganado para terminar el juego
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
        return "1"
    elif ganador == 2:
        return "2"
    else:
        return "0"

while esGanador() == "0":
    acabado="no"
    print("")
    print("")
    print(".........................")
    print("Tu Turno")
    print(".........................")
    print("")
    print("")
    
    ##Comprobamos que los valores introducidos sean validos
    columna=-1
    while columna<0 or columna>7: 
        columna = int (input( "Introduce la columna donde quieres poner la ficha: "))
        if columna<0 or columna>7:
            print("¡Error! Las columnas van del 0 al 7")

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
    
    turno = "1"
    for i in range(7, -1, -1):
        if acabado == "no":
           if matriz[i][columna] == "_":
                jugarJugador(columna, i, turno)
                listaJugador1[i][int(columna/2)]=1;
                acabado = "si"
            
   
    dibujar()
    if esGanador()=="1":
        print("Enhorabuena!!! Has ganado!!")
    elif esGanador()=="0":
        
        ##turno segundo jugador
        acabado2 = "no"
        turno = "2"
        print("")
        print("")
        print(".........................")
        print("Turno para el adversario")
        print(".........................")
        print("")
        print("")
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
        
        for j in range(7, -1, -1):
            if acabado2 == "no":
               if matriz[j][columna2] == "_":
                    jugarJugador(columna2, j, turno)
                    listaJugador2[j][int(columna2/2)]=1;
                    acabado2 = "si"
        
        dibujar()
        if esGanador()=="2":
            print ("Lo siento, has perdido :( ")
