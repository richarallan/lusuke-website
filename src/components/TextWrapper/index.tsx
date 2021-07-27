import * as S from './styles'

type TextWrapperProps = {
  children: React.ReactNode
}

const TitleWrapper = ({ children }: TextWrapperProps) => (
  <S.TextWrapper>{children}</S.TextWrapper>
)

export default TitleWrapper
