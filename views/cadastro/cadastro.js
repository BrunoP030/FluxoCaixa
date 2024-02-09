function cadastro(){
    document.querySelector("#btnCad").addEventListener("click", function(){
        let dados=[]
        dados.push(document.getElementById('txtusuario').value,
                    document.getElementById('id').value,
                    document.getElementById('senha').value,
                    document.getElementById('lvlacess').value)
        if(document.getElementById('txtusuario').value == '' || document.getElementById('txtusuario'.value == null)){
            alert("Preencha o campo Nome Usuario");
        }else if(document.getElementById('id').value == '' || document.getElementById('id'.value == null)){
            alert("Preencha o campo Id Usuario");
        }else{
            axios.post(`${BASEURL}` + "cadastro/cadastro", {"dados": dados}).then(res=>{
                if(res.data.codigo==1){
                    alert(res.data.texto);
                }
                else if(res.data.codigo == 0){
                    alert(res.data.texto);
                }
            })
        }
    })
}
cadastro()
function getLvl(){
    axios.post(`${BASEURL}` + 'cadastro/getLvl').then(res=>{
        console.log(res.data)
        let txt = `<option value= "" selected disabled> Selecione o nivel</option>`
        for(i=0; i<res.data.data.length; i++){  
            txt+=`<option value = "${res.data.data[i].codigo}">${res.data.data[i].nivel}</option>`
        }
        $("#lvlacess")[0].innerHTML = txt;
    })
}
getLvl()