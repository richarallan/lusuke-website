import { screen, render } from '@testing-library/react'
import TitleText from '.'

describe('<TitleText />', () => {
  it('should render title text', () => {
    render(<TitleText>Buceta é bom demais</TitleText>)

    const text = screen.getByRole('heading', {
      name: /buceta é bom demais/i
    })

    expect(text).toBeInTheDocument()
  })
})
