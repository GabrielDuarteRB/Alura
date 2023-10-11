const database = require('../models');

class NivelController {

    static async pegaTodosOsNiveis(req, res) {
        try {
            const todosOsNiveis = await database.Niveis.findAll();
            return res.status(200).json(todosOsNiveis);
        } catch (error) {
            return res.status(500).json(error);
        }
    }

    static async pegaNivel(req, res) {
        const { id } = req.params;
        try {
            const niveis = await database.Niveis.findOne({
                where: {
                    id: Number(id)
                }
            });            
            return res.status(200).json(niveis);
        } catch (error) {
            return res.status(500).json(error);
        }
    }

    static async criaNivel(req, res) {
        const novaNivel = req.body;
        try {
            const nivel = await database.Niveis.create(novaNivel);
            return res.status(200).json(nivel);
        } catch (error) {
            return res.status(500).json(error); 
        }
    }

    static async atualizaNivel(req, res) {
        const novasInfos = req.body;
        const { id } = req.params;

        try {
            await database.Niveis.update(novasInfos, {
                where: {
                    id: Number(id)
                }
            });
            
            const nivelAtualizada = await database.Niveis.findOne({
                where: {
                    id: Number(id)
                }
            });

            res.status(200).json(nivelAtualizada);
        } catch (error) {
            return res.status(500).json(error); 
        }
    }

    static async apagaNivel(req, res) {
        try {
            const { id } = req.params;
            await database.Niveis.destroy({
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

module.exports = NivelController;