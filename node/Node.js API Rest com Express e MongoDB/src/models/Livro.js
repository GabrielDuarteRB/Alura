import mongoose from "mongoose";
import validatorIdAutor from "./validatorIdAutor.js";

const livrosSchema = new mongoose.Schema(
    {
        id: {type: String},
        titulo: {
            type: String,
            required: [true, "O titulo do livro é obrigatorio"]
        },
        autor: {
            type: mongoose.Schema.Types.ObjectId, 
            ref: "autores", 
            required: [true, "O(a) autor(a) é obrigatorio"],
            validate: {
                validator: (id) => validatorIdAutor(id),
                message: "O id do autor nao existe!"
            }
        },
        editora: {
            type: String,
            required: [true, "A editora é obrigatorio"],
            enum: {
                values: ["Casa do código", "Alura"],
                message: "A editora {VALUE} não é um valor permitido"
            }
        },
        numeroPaginas: {
            type: Number,
            min: [10, "O numero de paginas deve estar entre 10 e 5000"],
            max: [5000, "O numero de paginas deve estar entre 10 e 5000"]
        }
    }
);

const livros = mongoose.model("livros", livrosSchema);

export default livros;