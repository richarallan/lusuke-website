import { render, screen } from '@testing-library/react'
import MainText from '.'

describe('<MainText />', () => {
  it('should be render a text wrapper', () => {
    render(<MainText>Aqui um texto aleatório</MainText>)

    const texto = screen.getByText(/Aqui um texto aleatório/i)
    expect(texto).toBeInTheDocument()
  })
})
