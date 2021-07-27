import { screen, render } from '@testing-library/react'
import TitleWrapper from '.'

describe('<TitleWrapp />', () => {
  it('should render title text', () => {
    render(<TitleWrapper>Buceta é bom demais</TitleWrapper>)

    const text = screen.getByRole('heading', {
      name: /buceta é bom demais/i
    })

    expect(text).toBeInTheDocument()
  })
})
