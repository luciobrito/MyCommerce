import axios from "axios";

export function getProdutos(){
    var data;
    axios.get("http://localhost:8000/api/produto").then(x => {data = x.data}).catch().finally();
    return data;
}

function postProduto(dataProduto){

}

function getProdutoById(idProduto){

}