sexo = prompt("Cual es tu sexo (M/F)?");
nombre = prompt("Cual es tu nombre?");
if ((sexo == "M" && nombre.charAt(0) >= "N") || (sexo == "F" && nombre.charAt(0) <= "M"))alert("Grupo A");
else alert("Grupo B");