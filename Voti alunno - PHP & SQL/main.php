<?php
  include 'conn.py'
  $conn = getConnection();
  generateDB($conn);


  // Funzione n.1 trova tutti gli studenti che presentano voti inferiori al 6
  function voti_negativi() {
    $query = "SELECT s.NomeStudente AS nome, s.CognomeStudente AS cognome FROM Sudente s INNER JOIN Voto v ON s.id_studente = v.id_studente WHERE v.Voto < 6 GROUP BY NomeStudente, CognomeStudente";
    $risultato = $conn -> query($query);

    return $risultato;
  }

  // Funzione n.2 trova tutti gli studenti che hanno solo voti superiori a 6
  // Questo non e` l'unico modo per fare la query, si poteva fare anche cosi:
  // SELECT NomeStudente, CognomeStudente FROM Studente s WHERE NOT EXISTS (SELECT Voto FROM Voto v WHERE v.Voto > 6 AND v.id_studente = s.id_studente)
  function solo_positivi() {
    $query = "SELECT s.NomeStudente AS nome, s.CognomeStudente AS cognome FROM Studente s WHERE s.id_studente NOT IN (SELECT st.id_studente FROM Sudente st INNER JOIN Voto v ON st.id_studente = v.id_studente WHERE v.Voto < 6 GROUP BY id_studente");
    $risultato = $conn -> query($query);

    return $risultato;
  }

  // Funcione n.3 trova tutti gli studenti che hanno da 3 materie negative in su
  function materie_negative() {
    $query = "SELECT s.NomeStudente AS nome, s.CognomeStudente AS cognome FROM Studente s WHERE 3 >= (SELECT count(*) FROM (SELECT id_materia, count(*) AS materie_negative FROM Materie m INNER JOIN Voti v ON v.id_materia = m.id_materia WHERE v.id_studente = s.id_studente AND v.Voto <= 5))";
    $risultato = $conn -> query($query);

    return $risultato;
  }


?>