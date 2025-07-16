function agregarFila() {
    const tabla = document.getElementById("tabla-heroes").getElementsByTagName("tbody")[0];
    const nuevaFila = tabla.rows[0].cloneNode(true);
    // Limpiar valores
    nuevaFila.querySelectorAll("input, select").forEach(el => {
        if (el.tagName === 'SELECT') el.selectedIndex = 0;
        else el.value = '';
    });
    tabla.appendChild(nuevaFila);
}

function eliminarFila() {
    const tabla = document.getElementById("tabla-heroes").getElementsByTagName("tbody")[0];
    if (tabla.rows.length > 1) {
        tabla.deleteRow(tabla.rows.length - 1);
    }
}

function actualizarCasas(selectAtributo) {
    const atributo = selectAtributo.value;
    const fila = selectAtributo.closest('tr');
    const selectCasa = fila.querySelector('.select-casa');
    fetch(`casas.php?atributo=${atributo}`)
        .then(response => response.text())
        .then(data => {
            selectCasa.innerHTML = data;
        })
        .catch(error => {
            console.error("Error al obtener casas:", error);
        });
}

// function obtenerAtributos() {
//     fetch("atributos.php")
//         .then(response => {
//             if (!response.ok) throw new Error("Error al obtener departamentos");
//             return response.text();
//         })
//         .then(data => {
//             document.querySelector("#atributo").innerHTML = data;
//             document.querySelector("#n_casa").value = '';
//         })
//         .catch(error => {
//             console.error("Error:", error);
//         });
// }

// function obtenerCasas() {
//     const hero_atributo = document.getElementById('atributo').value;
//     fetch(`casas.php?atributo=${hero_atributo}`)
//         .then(response => {
//             if (!response.ok) throw new Error("Error al obtener casas");
//             return response.text();
//         })
//         .then(data => {
//             document.querySelector("#n_casa").innerHTML = data;
//         })
//         .catch(error => {
//             console.error("Error:", error);
//         });
// }