const database = require('../models');

class PessoaController {

    static async pegaTodasAsPessoas(req, res) {
        try {
            const todasAsPessoas = await database.Pessoas.findAll();
            return res.status(200).json(todasAsPessoas);
        } catch (error) {
            return res.status(500).json(error);
        }
    }

    static async pegaPessoa(req, res) {
        const { id } = req.params;
        try {
            const pessoa = await database.Pessoas.findOne({
                where: {
                    id: Number(id)
                }
            });            
            return res.status(200).json(pessoa);
        } catch (error) {
            return res.status(500).json(error);
        }
    }

    static async criaPessoa(req, res) {
        const novaPessoa = req.body;
        try {
            const pessoa = await database.Pessoas.create(novaPessoa);
            return res.status(200).json(pessoa);
        } catch (error) {
            return res.status(500).json(error); 
        }
    }

    static async atualizaPessoa(req, res) {
        const novasInfos = req.body;
        const { id } = req.params;

        try {
            await database.Pessoas.update(novasInfos, {
                where: {
                    id: Number(id)
                }
            });
            
            const pessoaAtualizada = await database.Pessoas.findOne({
                where: {
                    id: Number(id)
                }
            });

            res.status(200).json(pessoaAtualizada);
        } catch (error) {
            return res.status(500).json(error); 
        }
    }

    static async apagaPessoa(req, res) {
        try {
            const { id } = req.params;
            await database.Pessoas.destroy({
                where: {
                    id: Number(id)
                }
            })

            return res.status(200).json({message: "Registro apagado com sucesso"})
        } catch (error) {
            return res.status(500).json(error);
        }
    }

}

module.exports = PessoaController;