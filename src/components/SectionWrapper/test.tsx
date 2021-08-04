import { render, screen } from '@testing-library/react'
import SectionWrapper from '.'

describe('<SectionWrapper />', () => {
  it('should be render a normal text', () => {
    render(<SectionWrapper>Olá você</SectionWrapper>)

    const texto = screen.getByText(/Olá você/i)
    expect(texto).toBeInTheDocument()

    screen.logTestingPlaygroundURL()
  })
})
