import { render, screen } from '@testing-library/react'
import PageIntro from '.'

describe('<PageIntro />', () => {
  it('should be render a PageIntro Component', () => {
    render(<PageIntro>maria e jose</PageIntro>)

    const obj = screen.getByText(/maria e jose/i)
    // const obj2 = screen.getByText(/Strong is cool/i)
    // const obj3 = screen.getByText(/Like odin sama!/i)
    expect(obj).toBeInTheDocument()
    // expect(obj2).toBeInTheDocument()
    // expect(obj3).toBeInTheDocument()
    screen.logTestingPlaygroundURL()
  })
})
