/*
  	Dado un array nxn, devuelve los elementos ordenados de fuera hacia dentro
	en espiral en el sentido de las agujas del reloj.

	Ejemplo:
	array = [[1,2,3],
             [4,5,6],
             [7,8,9]]
	snail(array) #=> [1,2,3,6,9,8,7,4,5]

	Nota: El objetivo NO es ordenar los elementos de menor a mayor, sino recorrer
	la matriz en espiral.
	Nota: La matriz 0x0 se representa como [[]]
*/

// export default 
function snail(array) {
	const resultado = [];

	while(array.length > 0){
		resultado.push(...array.shift())
		for(let i = 0; i<array.length;i++){
			resultado.push(array[i].pop())
		}
		resultado.push(...array.pop().reverse());
	}

	console.log(resultado)
}

const array = [
	[1, 2, 3],
	[4, 5, 6],
	[7, 8, 9],
	[10,11,12],
  ];
  
  const resultado = snail(array);