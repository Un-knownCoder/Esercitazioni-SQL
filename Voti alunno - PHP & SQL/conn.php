<?php

  function getConnection() {
    $host = "";
    $user = "";
    $pass = "";
    $dtbs = "";

    // Creo la connessione al DB
    $conn = new mysqli($host, $user, $pass, $dtbs);

    // Controllo eventuali errori
    if ($conn -> connect_errno) {
      die("403 - Connessione fallita: Errore(" . $conn -> connect_errno . "): " . $conn -> connect_error);
    }

    // Ritorno la connessione
    return $conn;
  }

  function generateDB($conn) {
    // Genero il DATABASE al completo se non dovesse essere ancora stato creato
    $a = $conn -> query("CREATE DATABASE IF NOT EXISTS Scuola");

    // Ora creo le tre tabelle (controllando che non esistano prima di generarle)
    $b = $conn -> query("CREATE TABLE IF NOT EXISTS Studente (id_studente INT NOT NULL PRIMARY KEY, NomeAlunno CHAR, CognomeAlunno CHAR)");
    $c = $conn -> query("CREATE TABLE IF NOT EXISTS Materia (id_materia INT NOT NULL PRIMARY KEY, NomeMateria CHAR)");
    $d = $conn -> query("CREATE TABLE IF NOT EXISTS Voto (id_voto INT NOT NULL PRIMARY KEY, Voto INT, id_materia INT, id_studente INT, FOREIGN KEY id_studente REFERENCES Studente.id_studente, FOREIGN KEY id_materia REFERENCES Materia.id_materia)");
  
    
    // Il controllo non funziona

    // if ($a != 1 || $b != 1 || $c != 1 || $d != 1) {
    //   echo("!!! - Qualcosa e` andato storto durante la creazione delle tabelle (controlla nel DB)");
    // }
  }

?>