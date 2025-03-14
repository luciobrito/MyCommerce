
export function dateOnly(date) {
    var meses = ["janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"]
    var newDate = new Date(date);
    var d = { "dia": newDate.getDate(), "mes": newDate.getMonth(), "ano": newDate.getFullYear() };
    return `${d.dia} de ${meses[d.mes]} de ${d.ano}`
}