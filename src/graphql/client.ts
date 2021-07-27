//responsável por fazer a configuração com o client
import { GraphQLClient } from 'graphql-request'

const endpoint = process.env.GRAPHQL_HOST || ''
// const endpoint =
//   'https://api-us-east-1.graphcms.com/v2/ckrksb2zi1x2301z18h6wgk1v/master'

const client = new GraphQLClient(endpoint, {
  headers: {
    authorization: `Bearer ${process.env.GRAPHQL_TOKEN}`
  }
})

export default client
