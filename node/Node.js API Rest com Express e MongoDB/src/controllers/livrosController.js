import NaoEncontrado from "../erros/NaoEncontrado.js";
import {autores, livros} from "../models/index.js";

class LivroController {

    static listarLivros = async (req, res, next) => {
        try {
            const buscaLivros = livros.find();

            req.resultado = buscaLivros;

            next();
        } catch (error) {
            next(error);
        }
    };

    static cadastrarLivro = async (req, res, next) => {
        try {
            let livro = new livros(req.body);

            const livrosResultado = await livro.save();

            res.status(201).send(livrosResultado.toJSON());
        } catch (error) {
            next(error);
        }
    };

    static listarLivroPorId = async (req, res, next) => {
        try {
            const { id } = req.params;

            const livrosResultado = await livros.findById(id)
                .populate("autor", "nome") 
                .exec();

            if(livrosResultado !== null) {
                res.status(200).send(livrosResultado);
            } else {
                next(new NaoEncontrado("Id do livro nao encontrado"));
            }                
        } catch (error) {
            next(error);
        }
    };

    static atualizarLivro = async (req, res, next) => {
        try {
            const { id } = req.params;
            const livrosResultado = await livros.findByIdAndUpdate(id, {$set: req.body});

            if(livrosResultado !== null) {
                res.status(200).send({ message: "O livro foi atualizado com sucesso" });
            } else {
                next(new NaoEncontrado("Id do livro nao encontrado"));
            }        

        } catch (error) {
            next(error);
        }

    };

    static excluirLivro = async (req, res, next) => {
        try {
            const { id } = req.params;
            const livrosResultado = await livros.findByIdAndDelete(id);

            if(livrosResultado !== null) {
                res.status(200).send({ message: "Livro excluido com sucesso" });
            } else {
                next(new NaoEncontrado("Id do livro nao encontrado"));
            }        

        } catch (error) {
            next(error);
        }
    };

    static listarLivroPorFiltro = async (req, res, next) => {
        try {
            
            const busca = await processaBusca(req.query);

            if(busca !== null) {
                const livrosResultado = livros
                    .find(busca)
                    .populate("autor");

                req.resultado = livrosResultado;

                next();
            } else {
                res.status(200).send([]);
            }

        } catch (error) {
            next(error);
        }
    };
}

async function processaBusca(parametros) {
    const { editora, titulo, maxPag, minPag, nomeAutor } = parametros;

    let busca = {};

    if (editora) busca.editora = editora;

    if (titulo) busca.titulo = { $regex: titulo, $options: "i" };

    if (maxPag || minPag) busca.numeroPaginas = {};
    if (minPag) busca.numeroPaginas.$gte = minPag; 
    if (maxPag) busca.numeroPaginas.$lte = maxPag ;

    if(nomeAutor) {
        const autor = await autores.findOne({nome: nomeAutor});

        if(autor !== null) {
            busca.autor = autor._id;
        } else {
            busca = null;
        }
    }

    return busca;
}

export default LivroController;