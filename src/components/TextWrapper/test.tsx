import { render, screen } from '@testing-library/react'
import TextWrapper from '.'

describe('<TextWrapper />', () => {
  it('should be render a text wrapper', () => {
    render(<TextWrapper>Aqui um texto aleatório</TextWrapper>)

    const texto = screen.getByText(/Aqui um texto aleatório/i)
    expect(texto).toBeInTheDocument()

    screen.logTestingPlaygroundURL()
  })
})
