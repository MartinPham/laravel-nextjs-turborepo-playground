module.exports = {
  'openapi': {
    input: './openapi.json',
    output: {
      baseUrl: {
        getBaseUrlFromSpecification: true
      },
      client: 'fetch',
      target: './src/client.ts',
      schemas: './src/schemas'
    },
  },
};
