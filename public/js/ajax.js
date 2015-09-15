// Mini-API para ajax.

// Perceba que a definição do objeto AJAX utiliza a notação literal para objetos ({propriedade:valor,...}),
// só que passando funções como valores (no javascript, funções são objetos também).
// Propriedades (send,get,post,...), se forem funções, podem ser chamados como se fosse métodos, basta por
// os parênteses com os argumentos na frente.
var AJAX = {
	
	// envia uma requisição ajax, com callbacks para preparação, sucesso e falha da mesma.
	send:function(method,url,payload,onbeforesend,onsuccess,onfailure) {
		
		// O objeto XMLHttpRequest é quem faz a mágica do Ajax. Em versões bem antigas do IE (5,6), a API era
		// um diferente, mas esta foi padronizada, e todos os browsers modernos (inclusive os IE7+) utilizam este objeto.
		// Apesar de ter XML no nome, ele não se restringe a enviar e receber XML, mas qualquer formato texto.
		// Versões mais novas dos browsers conseguem tratar inclusive formatos binários!
		var req = new XMLHttpRequest();
		
		// este callback é chamado a cada mudança de estado do objeto (ver documentação)
		req.onreadystatechange = function() {
			
			switch (req.readyState) {
				case 0: // UNSENT: ignorar
					break;
				case 1: // OPENED: ignorar
					break;
				case 2: // HEADERS_RECEIVED: ignorar
					break;
				case 3: // LOADING: ignorar
					break;
				case 4: // DONE: requisição concluída. se o retorno for OK, executar onsuccess(), senão, onfailure().
					if (req.status == 200) {
						if (onsuccess != null) {
							onsuccess(req);
						}
					} else {
						if (onfailure != null) {
							onfailure(req);
						}
					}
					break;
				default:
					break;
			}
		};
		
		// abre a conexão com a URL
		req.open(method,url,true);
		
		if (onbeforesend != null) {
			// callback para processar a requisição e o payload antes do envio
			payload = onbeforesend(req, payload);
		}
		
		// envio do payload
		req.send(payload);
	},
	// envia uma requisição ajax utilizando o método GET
	get:function(url,payload,onsuccess,onfailure) {
		AJAX.send('GET',url,payload,null,onsuccess,onfailure);
	},
	// envia uma requisição ajax utilizando o método POST
	post:function(url,payload,onsuccess,onfailure) {
		AJAX.send('POST',url,payload,null,onsuccess,onfailure);
	},
	// envia uma requisição ajax utilizando o método POST, passando parâmetros codificados como em um formulário.
	// aceita tanto uma string com os parâmetros pré-codificados, ou um objeto com os parâmetros como pares chave/valor.
	formPost:function(url,payload,onsuccess,onfailure) {
		var onbeforesend = function(req,payload) {
			// header para que o servidor interprete o POST como o envio de um formulário
			req.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

			if (typeof payload == 'string') {
				// se for string, envia AS IS
				return payload;
			
			} else {
				// senão, codifica as propriedades como parâmetros
				var params = [];
				for (var param in payload) {
					params.push(param+"="+encodeURIComponent(payload[param]));
				}
				return params.join('&');
			}
		};
		AJAX.send('POST',url,payload,onbeforesend,onsuccess,onfailure);
	}
};
