import { render, screen } from '@testing-library/react'
// import PageIntro from '.'
import { IntroText, IntroTitle } from './styles'

describe('<IntroTitle />', () => {
  it('should be render a PageIntro Component', () => {
    render(<IntroTitle>maria e jose</IntroTitle>)

    const obj = screen.getByText(/maria e jose/i)
    // const obj2 = screen.getByText(/Strong is cool/i)
    // const obj3 = screen.getByText(/Like odin sama!/i)
    expect(obj).toBeInTheDocument()
    // expect(obj2).toBeInTheDocument()
    // expect(obj3).toBeInTheDocument()
    screen.logTestingPlaygroundURL()
  })
  it('<IntroText />', () => {
    render(<IntroText>mimimi mimimi nanana</IntroText>)
    const obj2 = screen.getByText(/mimimi mimimi nanana/i)
    expect(obj2).toBeInTheDocument()
    screen.logTestingPlaygroundURL()
  })
})
