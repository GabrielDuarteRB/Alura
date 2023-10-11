const Services = require('./Services.js');
const database = require('../models')

class PessoasServices extends Services {
  constructor() {
    super('Pessoas');
    this.matriculas = new Services('Matriculas')
  }

  async pegaRegistrosAtivos(where = {}) {
    return database[this.nomeDoModelo].findAll({
        where: { ...where }
    })
  }

  async pegaTodosOsRegistros(where = {}) {
    return database[this.nomeDoModelo]
        .scope('todos')
        .findAll({
            where: { ...where }
        })
  }

  async cancelaPessoasEMatriculas(estudanteId) {
    return database.sequelize.transaction(async t => {

        await super.atualizaRegistro(
            { ativo: false }, 
            estudanteId, 
            { transaction: t }
        )

        await this.matriculas.atualizaRegistros(
            { status: 'cancelado' }, 
            { estudante_id: estudanteId },
            { transacao: t}
        )
    })
  }
}

module.exports = PessoasServices