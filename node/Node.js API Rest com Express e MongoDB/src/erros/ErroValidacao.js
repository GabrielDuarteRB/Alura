import RequisicaoIncorreta from "./RequisicaoIncorreta.js";

class ErroValidacao extends RequisicaoIncorreta {
    constructor(error) {
        const mesagensErro = Object.values(error.errors)
            .map(erro => erro.message)
            .join("; ");

        super(`Os seguintes erros foram encontrados: ${mesagensErro}`);
    }
}

export default ErroValidacao;