function getFluxo(){
    axios.post(`${BASEURL}` + 'lancamentos/getFluxo').then(res=>{
        let txt = `<option value= "" selected disabled> Selecione o Tipo de Fluxo</option>`
        for(i=0; i<res.data.data.length; i++){
            txt+=`<option value = "${res.data.data[i].codigo}">${res.data.data[i].fluxo}</option>`
        }
        console.log(txt)
        $("#fluxo")[0].innerHTML = txt;
    })
}
getFluxo()

function getTpLanc(){
    axios.post(`${BASEURL}` + 'lancamentos/getTpLanc').then(res=>{        let txt = `<option value= "" selected disabled> Selecione o Tipo de Fluxo</option>`
        for(i=0; i<res.data.data.length; i++){
            txt+=`<option value = "${res.data.data[i].sequencia}">${res.data.data[i].tplanc}</option>`
        }
        console.log(txt)
        $("#lanc")[0].innerHTML = txt;
    })
}
getTpLanc()

function lancamento(){
    let dados=[]
    document.getElementById('btnInc').addEventListener("click", function(){
        dados.push(document.getElementById('txtvalor').value,
                    document.getElementById('txtobs').value,
                    document.getElementById('lanc').value,
                    document.getElementById('fluxo').value)
        if(document.getElementById('txtvalor').value == "" || document.getElementById('txtvalor').value == null){
            alert("Preencha o campo valor")
        }else if(document.getElementById('txtobs').value == "" || document.getElementById('txtobs').value == null){
            alert("Preencha o campo Observação")
        }else if(document.getElementById('lanc').value == "" || document.getElementById('lanc').value == null){
            alert("Selecione o tipo de lançamento")
        }else if(document.getElementById('fluxo').value == "" || document.getElementById('fluxo').value == null){
            alert("Selecione o tipo de fluxo");
        }else{
            axios.post(`${BASEURL}` + "lancamentos/lancamento", {dados}).then(res=>{
                if(res.data.codigo==1){                    
                    alert(res.data.texto)
                    res.data.direcao
                }else if(res.data.codigo == 0){
                    alert(res.data.texto)
                }
            })
        }
    })
}
lancamento()

function relatorio(){
    document.querySelector("#lsrelatorio").innerHTML="";
   axios.post(`${BASEURL}`+ "lancamentos/relatorio").then(res=>{
        var txt=""
            for(var i = 0; i< res.data.length; i++){
                var reg=res.data[i];
                txt+=`<tr><td>${reg.tplanc}</td><td>${reg.descricao}</td><td>${reg.valor}</td><td>${reg.data}</td><td>${reg.obs}</td></tr>`
            }
            document.querySelector("#lsrelatorio").innerHTML=txt
   })
}


function pesquisa(){
    document.getElementById('btnPsq').addEventListener("click", function(){

        const obj = {
            dataI: document.getElementById('datainicio').value,
            dataF: document.getElementById('datafim').value
        }
        
        axios.post(`${BASEURL}`+ "lancamentos/pesquisa", obj).then((res) => {

            if(res.data.codigo==1){
                var txt=""
                console.log("aqui")
                console.log(res.data.select)
                var x =res.data.select

                for(var i = 0; i < x.length; i++){
                    var reg = x[0];                    
                    txt+=`<tr><td>${reg.tplanc}</td><td>${reg.descricao}</td><td>${reg.valor}</td><td>${reg.data}</td><td>${reg.obs}</td></tr>`                }
                document.querySelector("#lsrelatorio").innerHTML = txt
            }else{
                alert("Erro")
            }
       })
       
    })
}
pesquisa()

        document.querySelector("#btnRlt").addEventListener("click", function(){
            relatorio()
        })