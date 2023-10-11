const database = require('../models');

class TurmaController {

    static async pegaTodasAsTurmas(req, res) {
        try {
            const todasAsTurmas = await database.Turmas.findAll();
            return res.status(200).json(todasAsTurmas);
        } catch (error) {
            return res.status(500).json(error);
        }
    }

    static async pegaTurma(req, res) {
        const { id } = req.params;
        try {
            const turma = await database.Turmas.findOne({
                where: {
                    id: Number(id)
                }
            });            
            return res.status(200).json(turma);
        } catch (error) {
            return res.status(500).json(error);
        }
    }

    static async criaTurma(req, res) {
        const novaTurma = req.body;
        try {
            const turma = await database.Turmas.create(novaTurma);
            return res.status(200).json(turma);
        } catch (error) {
            return res.status(500).json(error); 
        }
    }

    static async atualizaTurma(req, res) {
        const novasInfos = req.body;
        const { id } = req.params;

        try {
            await database.Turmas.update(novasInfos, {
                where: {
                    id: Number(id)
                }
            });
            
            const turmaAtualizada = await database.Turmas.findOne({
                where: {
                    id: Number(id)
                }
            });

            res.status(200).json(turmaAtualizada);
        } catch (error) {
            return res.status(500).json(error); 
        }
    }

    static async apagaTurma(req, res) {
        try {
            const { id } = req.params;
            await database.Turmas.destroy({
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

module.exports = TurmaController;