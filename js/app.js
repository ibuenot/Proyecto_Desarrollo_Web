const tabla = document.querySelector("#lista_api");
const boton=document.querySelector("#descargar");




const crearFila=(titulo, url_imagen, url_enlace)=> {
  const fila = document.createElement("tr");

  const enlace = document.createElement("a");
  enlace.innerHTML = "Ir a noticia";
  enlace.href = url_enlace;

  const imagen = document.createElement("img");
  imagen.src = url_imagen;

  const td_enlace = document.createElement("td");
  td_enlace.appendChild(enlace);

  const td_imagen = document.createElement("td");
  td_imagen.appendChild(imagen);

  const td_titulo = document.createElement("td");
  td_titulo.innerHTML = titulo;

  fila.appendChild(td_titulo);
  fila.appendChild(td_imagen);
  fila.appendChild(td_enlace);

  return fila;
}


boton.addEventListener("click", async () => {

  const respuesta= await fetch("http://www.rtve.es/api/noticias.json");
  const datos = await respuesta.json();

  const lista_noticias=datos["page"]["items"];
  tabla.innerHTML="";
  lista_noticias.forEach(
        (noticia)=>{

          tabla.appendChild(crearFila(noticia["longTitle"],
                                      noticia["imageSEO"],
                                      noticia["htmlURL"]));
        });


  })
