import NaoEncontrado from "../erros/NaoEncontrado.js";
import {autores} from "../models/index.js";

class autorController {

    static listarAutores = async (req, res, next) => {
        try {
            const autoresResultado = await autores.find();

            res.status(200).json(autoresResultado);
        } catch (error) {
            next(error);
        }
        
    };

    static cadastrarAutor = async (req, res, next) => {
        
        try {
            let autor = new autores(req.body);
            const autorResultado = await autor.save();

            res.status(201).send(autorResultado.toJSON());
        } catch (error) {
            next(error);
        }
    };

    static listarAutorPorId = async (req, res, next) => {

        try {
            const { id } = req.params;
            const autorResultado = await autores.findById(id);

            if(autorResultado !== null) {
                res.status(200).send(autorResultado);
            } else {
                next(new NaoEncontrado("Id do autor nao encontrado"));
            }
            
        } catch (error) {
            next(error);
        }
    };

    static atualizarAutor = async (req, res, next) => {
        try {
            const { id } = req.params;
            const autorResultado = await autores.findByIdAndUpdate(id, {$set: req.body});

            if(autorResultado !== null) {
                res.status(200).send({"message": "O autor foi atualizado com sucesso"});
            } else {
                next(new NaoEncontrado("Id do autor nao encontrado"));
            }
            
        } catch (error) {
            next(error);
        }
    };

    static excluirAutor = async (req, res, next) => {
        try {
            const { id } = req.params;

            const autorResultado =  await autores.findByIdAndDelete(id);

            if(autorResultado !== null) {
                res.status(200).send({ message: "autor excluido com sucesso" });
            } else {
                next(new NaoEncontrado("Id do autor nao encontrado"));
            }

        } catch (error) {
            next(error);
        }
    };

}

export default autorController;