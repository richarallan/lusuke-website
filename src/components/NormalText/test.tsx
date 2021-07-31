import { render, screen } from '@testing-library/react'
import NormalText from '.'

describe('<NormalText />', () => {
  it('should be render a normal text', () => {
    render(<NormalText>Aqui um texto aleatório</NormalText>)

    const texto = screen.getByText(/Aqui um texto aleatório/i)
    expect(texto).toBeInTheDocument()

    // screen.logTestingPlaygroundURL()
  })
})
