function ocultar(id) {
	document.getElementById(id).style.display = "none";
}

function mostrar(id) {
	// document.getElementById(id).style.display = "inline-block";

	var tela = document.getElementById(id)
	tela.style.display = "inline-block";


}

function ocultar_nav() {
	ocultar('vendas_resumo')
	ocultar('vendas_table')
	ocultar('frutas_resumo')
	ocultar('frutas_table')
	ocultar('sucos_resumo')
	ocultar('sucos_table')
	ocultar('admins_resumo')
	ocultar('admins_table')
}

function bt_nav(id_1, id_2) {
	ocultar_nav()
	mostrar(id_1)
	mostrar(id_2)
}


mostrar('vendas_resumo');
mostrar('vendas_table');