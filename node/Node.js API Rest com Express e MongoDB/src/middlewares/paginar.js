import RequisicaoIncorreta from "../erros/RequisicaoIncorreta.js";

async function paginar(req, res, next) {
    try {
        let { limite = 5, pagina = 1, ordenacao = "_id:-1"} = req.query;

        const [campoOrdenacao, ordem] = ordenacao.split(":");
        limite = parseInt(limite);
        pagina = parseInt(pagina);

        const resultado = req.resultado;    
    
        if(limite <= 0 || pagina <= 0) {
            return next(new RequisicaoIncorreta);
        }
    
        const resultadoPaginado = await resultado.find()
            .sort({ [campoOrdenacao]: ordem })
            .skip((pagina - 1) * limite)
            .limit(limite)
            .populate("autor")
            .exec();
    
        res.status(200).json(resultadoPaginado);   
    } catch (error) {
        next(error);
    }
}

export default paginar;